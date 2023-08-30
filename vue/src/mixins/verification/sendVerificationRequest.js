/**
 * Mixin used to send verification request from routes { ContractVerification, CounterVerification, SurnameVerification}
 * difference only with fields, response and API endpoint same
 */
export default {
  computed: {
    errorMessage() {
      return this.$store.state.Api.errors.message;
    },
  },
  created() {
    this.$store.commit("Api/setValidationErrors", null);
  },
  data() {
    return {
      routeToGo: this.$route.params.requested,
      showDialog: false,
      dialogMessage: "",
      success: false,
    };
  },
  methods: {
    async verificate() {
      let res = await this.$store.dispatch(
        "RegionalEnergy/verifyAccount",
        this.verification
      );
      if (res) {
        this.dialogMessage = this.$t("verification.successfullySend");
        this.success = true;
        this.showDialog = true;
      }
    },
    goToAccount() {
      if (this.success) {
        this.$router.push({
          name: this.routeToGo ? this.routeToGo : "Account",
          params: { account: this.$route.params.account },
        });
      }
    },
  },
};
