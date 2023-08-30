export default {
	computed: {
		routingHistory() {
			return this.$store.state.BackButton.routingHistory;
		},
	},
	methods: {
		goBack() {
			if (this.$route.name !== 'HomeView') {
				for (let i = this.routingHistory.length - 1; i >= 0; i--) {
					if (this.routingHistory[i].name !== this.$route.name) {
						let routeIndex = this.$route.meta.backButton.indexOf(
							this.routingHistory[i].name
						);
						if (
							routeIndex >= 0 &&
							this.routingHistory[i].name ===
								this.$route.meta.backButton[routeIndex]
						) {
							if (this.routingHistory[i].params === null) {
								this.navigateWithoutParams(this.routingHistory[i].name);
							} else {
								this.navigateWithParams(
									this.routingHistory[i].name,
									this.routingHistory[i].params
								);
							}
							return;
						}
					}
				}
				this.$router.push({ name: this.$route.meta.backButton[0] });
			}
		},
		navigateWithParams(name, params) {
			this.$router.push({ name, params });
		},
		navigateWithoutParams(name) {
			this.$router.push({ name });
		},
	},
};
