var currencyFormatter = require('currency-formatter');

export default {
    install: (app, options) => {

        // Translate
        app.config.globalProperties.$money = (amount, currency) => {
            return currencyFormatter.format(amount, { code: currency });
        },

        // Url
        app.config.globalProperties.$url = (to = '/') => {
            return __var_app_url + to;
        }

    }
}