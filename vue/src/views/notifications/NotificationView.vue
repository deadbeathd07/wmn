<template>
	<van-row justify="center" class="page-wrapper">
		<template v-if="notifications.length">
			<van-col span="24" class="flex-display-fix">
				<template v-for="notification in notifications">
					<template v-if="notification">
						<ItserveNotification
							v-bind:key="notification.id"
							:title="notification.title"
							:date="formatDate(notification.updated_at)"
							:status="notification.read_status"
							:id="notification.id"
						>
							{{ notification.text }}
						</ItserveNotification>
					</template>
				</template>
			</van-col>
		</template>
		<template v-else>
			<van-col span="24" class="round-shadow-btn">
				<div class="place-content-center">
					<ItserveNotification :title="$t('notifications.notFoundTitle')">{{
						$t('notifications.notFoundText')
					}}</ItserveNotification>
				</div>
			</van-col>
		</template>
	</van-row>
</template>
<script setup>
import ItserveNotification from '@/components/ItserveNotification';
import { watch } from 'vue';
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import { useStore } from 'vuex';

const route = useRoute();
const store = useStore();

const notifyParams = route.params;

const notifications = computed(() => store.state.Notifications.notifications);

if (notifyParams.account) {
	store.dispatch(
		'Notifications/getNotificationsByAccount',
		notifyParams.account
	);
} else {
	store.dispatch('Notifications/getNotifications');
}

watch(notifications, () => {
	if (notifications.length) {
		let markAsRead = notifications
			.filter(notification => {
				if (notification.read_status == 0) {
					return true;
				}
				return false;
			})
			.map(notification => notification.id);
		if (markAsRead.length) {
			store.dispatch('Notifications/markAsRead', markAsRead);
		}
	}
});

function formatDate(date) {
	let dateToFormat = new Date(date);

	let hours = dateToFormat.getHours();
	hours = hours < 10 ? '0' + hours : hours;

	let minutes = dateToFormat.getMinutes();
	minutes = minutes < 10 ? '0' + minutes : minutes;

	let day = dateToFormat.getDate();
	day = day < 10 ? '0' + day : day;

	return `${day}-${
		dateToFormat.getMonth() + 1
	}-${dateToFormat.getFullYear()} ${hours}:${minutes} `;
}
</script>
<style scoped></style>
