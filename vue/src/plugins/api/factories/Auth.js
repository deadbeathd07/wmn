import api from "@/plugins/api/EntryPoint";
export default {
  authenticate(cb) {
    return api.post("userAuth", cb);
  },
};
