/**
 * Function for delay
 * @param {*} ms
 * @returns
 */
function delay(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

module.exports = { delay };
