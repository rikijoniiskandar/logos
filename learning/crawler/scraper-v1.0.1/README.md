# Scraper App

Ini adalah aplikasi untuk melakukan scraping data dan mempublikasikan hasilnya ke broker MQTT. Aplikasi ini menggunakan Selenium untuk scraping dan MQTT untuk komunikasi data.

## Prasyarat

Sebelum memulai, pastikan Anda sudah menginstal hal-hal berikut:

- [Node.js](https://nodejs.org/) (Pastikan menggunakan versi yang mendukung aplikasi Anda)
- [PM2](https://pm2.keymetrics.io/) untuk mengelola aplikasi Node.js

## Instalasi

1. **Clone repositori ini** ke komputer Anda:

   ```bash
   git clone <repository-url>
   cd scraper-app

2. **Instalasi dependencies** menggunakan npm:

    ```bash
    npm install

3. **Install PM2 secara global** (jika Anda belum menginstalnya):

    ```bash
    npm install pm2 -g


# Konfigurasi `config.json`

File `config.json` digunakan untuk menyimpan pengaturan yang diperlukan untuk menjalankan aplikasi scraper dan koneksi ke MQTT broker. Berikut adalah contoh struktur file dan penjelasannya:

```json
{
  "webUrl": "http://example.com/login",
  "username": "your_username",
  "password": "your_password",
  "dashboardUrl": "http://example.com/dashboard",
  "waitAfterLoginUrlContains": "example",
  "mqttBroker": "mqtt://your-mqtt-broker",
  "mqttHost": "localhost",
  "mqttPort": 1883,
  "mqttProtocol": "mqtt",
  "mqttUsername": "mqtt_user",
  "mqttPassword": "mqtt_password",
  "mqttTopic": "scraper/data",
  "scrapeIntervalMs": 10000,
  "sensorPosition": "position_of_sensor",
  "idWaterLevelA": "water-level-a"
}
