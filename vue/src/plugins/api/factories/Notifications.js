import api from "@/plugins/api/EntryPoint";

export default {
  setReadNotifications(notifications, callBackFn) {
    return api.put(
      "notifications/update-status-read",
      { notifications: notifications },
      callBackFn
    );
  },
  getNotifications(callBackFn) {
    return api.get(`notifications/getAllNotificationsNew`, callBackFn);
  },
  deleteNotification(id, callBackFn) {
    return api.delete(`notifications/delete/${id}`, callBackFn);
  },
  getNotificationsByAccount(account, callBackFn) {
    return api.get(
      `notifications/getAllNotificationsNew?ls=${account}`,
      callBackFn
    );
  },
  getNotificationsCount(callBackFn) {
    return api.get(`notifications/all`, callBackFn);
  },
};
