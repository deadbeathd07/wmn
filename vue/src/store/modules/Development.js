import "@/plugins/nativescript-webview-interface.js";
let oWebViewInterface = window.nsWebViewInterface;

export const actions = {
  googleSign() {
    oWebViewInterface.emit("googleSignin");
  },
};
