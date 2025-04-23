const axios = require("axios");

// Mengecek apakah ada koneksi internet dengan mencoba request ke server umum
async function checkInternetConnection() {
  try {
    await axios.get("https://www.google.com", { timeout: 10000 });
    return true; // Koneksi internet tersedia
  } catch (error) {
    return false; // Tidak ada koneksi internet
  }
}

module.exports = { checkInternetConnection };
