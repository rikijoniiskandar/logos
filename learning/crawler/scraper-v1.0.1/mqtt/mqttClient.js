const mqtt = require("mqtt");

let mqttClient;
let bufferData = [];

/* Initiate MQTT connection */
function initMqttClient(config) {
  mqttClient = mqtt.connect(config.mqttBroker, {
    host: config.mqttHost,
    port: config.mqttPort,
    protocol: config.mqttProtocol,
    username: config.mqttUsername,
    password: config.mqttPassword,
    reconnectPeriod: 15000,
  });

  mqttClient.on("connect", () => {
    console.log("✅ MQTT Connected!");
  });

  mqttClient.on("error", (err) => {
    console.error("❌ MQTT Connection error:", err.message);
  });

  return mqttClient;
}

// Fungsi untuk mem-publish data yang tertunda
async function publishBufferedData() {
  if (bufferData.length === 0) return;

  bufferData.forEach((data) => {
    mqttClient.publish(data.topic, JSON.stringify(data.payload));
    console.log(`📡 Published buffered data:`, data);
  });
  bufferData = [];
}

// Menyimpan data ke buffer jika tidak ada koneksi internet
function saveToBuffer(data) {
  bufferData.push(data);
  console.log("⚠️ No internet. Data saved to buffer.");
}

module.exports = { initMqttClient, publishBufferedData, saveToBuffer };
