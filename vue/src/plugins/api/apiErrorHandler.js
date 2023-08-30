export default {
  /**
   * Depends on status returned from axios error object this method makes decision what app
   * should to do next (show error/retry or redirect user into login page)
   * @param err - error object from axios error
   * @returns {*} - response contain number depends on error, this error should be handled
   */
  getTypeOfError: (err) => {
    console.error(err);
    if (typeof err.code !== "undefined") {
      if (err.code === "ECONNABORTED") {
        return process.env.VUE_APP_RETRY_STATUS;
      }
    } else {
      if (typeof err.response !== "undefined") {
        if (err.response.status === 403 || err.response.status === 404) {
          return process.env.VUE_APP_REDIRECT_STATUS;
        } else if (err.response.status === 401) {
          return process.env.VUE_APP_REFRESH_TOKEN;
        } else if (err.response.status === 500) {
          return process.env.VUE_APP_ERROR_STATUS;
        } else if (err.response.status === 422 || err.response.status === 400) {
          return process.env.VUE_APP_VALIDATION_ERROR_STATUS;
        } else {
          return process.env.VUE_APP_ERROR_STATUS;
        }
      } else {
        return process.env.VUE_APP_ERROR_STATUS;
      }
    }
  },
};
