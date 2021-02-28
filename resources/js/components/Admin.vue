<template>
  <div v-for="notification in allNotifications">
    {{notification.data.createdUser.name}} has just registered on {{notification.created_at}}
  </div>     
</template>
 
<script>
export default {
  props: ["user"],
  data: () => ({
    drawer: null,
    allNotifications: [],
 
  }),
  
    created() {
      this.allNotifications = this.user.notifications;

    }
};
</script>