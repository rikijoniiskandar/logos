const fs = require("fs");

/**
 * Function to load configuration from JSON file
 * @returns 
 */
async function loadConfig() {
  const rawData = fs.readFileSync("config.json");
  return JSON.parse(rawData);
}

module.exports = { loadConfig };
