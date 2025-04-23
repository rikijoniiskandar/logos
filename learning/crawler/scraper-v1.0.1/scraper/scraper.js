const { Builder, By, until } = require("selenium-webdriver");
const firefox = require("selenium-webdriver/firefox");
const { loadConfig } = require("../config/config");
const { checkInternetConnection } = require("../internet/internetCheck");
const {
  initMqttClient,
  publishBufferedData,
  saveToBuffer,
} = require("../mqtt/mqttClient");
const { delay } = require("../utils/utils");

// Fungsi utama untuk memulai proses scraping
async function startScraping() {
  const config = await loadConfig();

  const {
    webUrl,
    mqttBroker,
    mqttTopic,
    scrapeIntervalMs,
    idWaterLevelA,
    geckodriverPath,
    waitAfterLoginUrlContains,
  } = config;

  // Inisialisasi koneksi MQTT
  const mqttClient = initMqttClient(config);

  let driver;

  try {
    let options = new firefox.Options();
    /* Inisialisasi driver Firefox */
    driver = await new Builder()
      .forBrowser("firefox")
      .setFirefoxOptions(options)
      .setFirefoxService(
        new firefox.ServiceBuilder(geckodriverPath)
      ) /* Sesuaikan dengan path geckodriver Anda */
      .build();

    // Login ke halaman login
    await driver.get(webUrl);
    await driver.wait(until.urlContains(waitAfterLoginUrlContains), 15000);
    console.log("✅ Reached the target page!");

    // Lakukan scraping pertama kali
    const spanElement = await driver.findElement(By.id(idWaterLevelA));
    const spanText = await spanElement.getText();

    if (spanText) {
      const data = {
        name: "Water Level A",
        value: spanText,
        unit: "cm",
        topic: mqttTopic,
        payload: { value: spanText, unit: "cm" },
      };

      // Cek koneksi internet sebelum mempublish
      const isConnected = await checkInternetConnection();
      if (isConnected) {
        mqttClient.publish(mqttTopic, JSON.stringify(data.payload));
        console.log(`📡 Published:`, data);
      } else {
        saveToBuffer(data);
      }
    }

    // Lakukan scraping berulang dengan interval yang ditentukan
    while (true) {
      const spanElement = await driver.findElement(By.id(idWaterLevelA));
      const spanText = await spanElement.getText();

      if (spanText) {
        const data = {
          name: "Water Level A",
          value: spanText,
          unit: "cm",
          topic: mqttTopic,
          payload: { value: spanText, unit: "cm" },
        };

        // Cek koneksi internet sebelum mempublish
        const isConnected = await checkInternetConnection();
        if (isConnected) {
          mqttClient.publish(mqttTopic, JSON.stringify(data.payload));
          console.log(`📡 Published:`, data);
        } else {
          saveToBuffer(data);
        }
      }

      await delay(scrapeIntervalMs); // Delay antar scraping
      await publishBufferedData(); // Coba kirim data buffer setiap interval
    }
  } catch (err) {
    console.error("❌ Error:", err.message);
  } finally {
    if (driver) {
      try {
        await driver.quit();
      } catch (e) {
        console.warn("⚠️ Error closing driver:", e.message);
      }
    }
    console.log("🔁 Restarting script in 30 seconds...");
    await delay(30000); // Retry setelah 30 detik
    await startScraping(); // Retry secara rekursif
  }
}

module.exports = { startScraping };
