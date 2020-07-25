import moment from 'moment';
import Vue from "vue";

Vue.filter('timeFormat', (arg) => {
    return moment(arg).format("MMM Do Y, h:mm:ss a");
});
