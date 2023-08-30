import notifications from "@/plugins/api/factories/Notifications";

export const state = {
  notifications: [],
  unreadNotifications: 0,
};

export const mutations = {
  SET_NOTIFICATIONS(state, notifications) {
    state.notifications = notifications;
  },
  SET_UNREAD_NOTIFICATIONS(state, notifications) {
    state.unreadNotifications = notifications;
  },
};

export const actions = {
  async deleteNotification({ dispatch }, notificationId) {
    await notifications.deleteNotification(notificationId);
    dispatch("deleteNotificationFromState", notificationId);
  },
  async deleteNotificationFromState({ state, commit }, notificationId) {
    let notifications = state.notifications;
    state.notifications = [];

    for (let i in notifications) {
      if (notifications[i].id === notificationId) {
        delete notifications[i];
        await commit(
          "SET_NOTIFICATIONS",
          notifications.filter(function (item) {
            return item !== undefined;
          })
        );
        console.log(state.notifications);
      }
    }
  },
  async markAsRead({ commit }, notificationIds) {
    return notifications.setReadNotifications(notificationIds, () => {
      commit("SET_UNREAD_NOTIFICATIONS", 0);
    });
  },
  async getNotifications({ commit }) {
    return notifications.getNotifications((response) => {
      console.log("CHLENIX getNotifications: " + JSON.stringify(response));
      commit("SET_NOTIFICATIONS", response);
    });
  },
  async getCountOfUnreadNotifications({ commit }) {
    return notifications.getNotificationsCount((response) => {
      commit("SET_UNREAD_NOTIFICATIONS", parseInt(response));
    });
  },
  async getNotificationsByAccount({ commit }, account) {
    return notifications.getNotificationsByAccount(account, (response) => {
      commit("SET_NOTIFICATIONS", response);
    });
  },
};
