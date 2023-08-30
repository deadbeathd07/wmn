var Tawk = {};
Tawk.install = function (Vue, options) {
  Vue.config.globalProperties.$Tawk = {};
  Vue.config.globalProperties.$Tawk.$createChat = function () {
    var Tawk_API = {};
    var Tawk_LoadStart = new Date();
    console.log(Tawk_LoadStart);
    var s1 = document.createElement("script");
    var s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = options.tawkSrc;
    s1.charset = "UTF-8";
    s1.setAttribute("crossorigin", "*");
    s0.parentNode.insertBefore(s1, s0);
    window.Tawk_API = Tawk_API;
  };
  Vue.config.globalProperties.$Tawk.$createChat();
  Vue.config.globalProperties.$Tawk.$updateChatUser = function (user) {
    if (!user) return;
    window.Tawk_API.onLoad = function () {
      window.Tawk_API.setAttributes(
        {
          name: user.name,
          email: user.email,
          hash: user.emailHmac,
        },
        function (error) {
          console.log(error);
        }
      );
    };
  };
  Vue.config.globalProperties.$Tawk.$endChat = function () {
    window.Tawk_API.endChat();
  };
  Vue.config.globalProperties.$Tawk.$isInit = function () {
    if (window.Tawk_API) {
      return true;
    }
    return false;
  };
};
export default Tawk;
