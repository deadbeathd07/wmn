// *
----------------------------------------------------------------------------------------*
//
<template>
    <div class="itserve-notification">
        <template v-if="id">
            <Close
                fill-color="#777777"
                class="close-dark close-icon"
                @click="deleteNotification(id)"
            />
            <Close
                fill-color="#ffffff"
                class="close-white close-icon"
                @click="deleteNotification(id)"
            />
        </template>
        <template v-if="title">
            <div
                class="itserve-notification-title"
                :class="status === 1 ? 'message-read' : 'message-new'"
            >
                {{ title }}
            </div>
        </template>
        <div class="itserve-notification-body">
            <slot></slot>
        </div>
        <template v-if="date">
            <div class="itserve-notification-time itserve-right">
                {{ date }}
            </div>
        </template>
    </div>
</template>
<script setup>
import Close from "vue-material-design-icons/Close";
import { useStore } from "vuex";

const store = useStore();

const { title, date, status, id } = defineProps({
    title: String,
    date: String,
    status: Number,
    id: {
        type: Number,
        default: 0,
    },
});

async function deleteNotification(id) {
    await store.dispatch("Notifications/deleteNotification", id);
}
</script>
<style scoped>
.close-icon {
    position: absolute;
    right: 20px;
    top: 18px;
}
.itserve-notification {
    position: relative;
    border-bottom: 1px solid #777777;
    padding-bottom: 10px;
}
.itserve-notification-title {
    margin: 20px 35px 20px 20px;
    color: #777777;
    font-size: 18px;
    font-weight: bold;
}
.itserve-notification-body {
    margin: 20px 20px 20px 20px;
    font-size: 18px;
    color: #777777;
}
.itserve-notification-time {
    font-size: 14px;
    padding: 10px 10px 0px 10px;
    font-weight: bold;
    margin-left: 20px;
    margin-right: 15px;
    color: #777777;
}
.itserve-notification:last-child {
    border-bottom: none;
}
</style>
<style>
.message-new {
    color: #1aad62 !important;
}
</style>
// *
----------------------------------------------------------------------------------------*
//
