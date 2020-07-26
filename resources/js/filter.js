import moment from 'moment';
import Vue from "vue";

Vue.filter('timeFormat',(arg) => {
    return moment(arg).format("MMM Do Y, h:mm:ss a");
});

// // Content text shorten not works
// Vue.filter('shortlenght', function (text,length, suffix) {
//     return text.substring(0,length) + suffix;
// });


// // Content text shorten
Vue.filter('short', function (value, limit, suffix) {

    if (value && value.length > limit) {
        value = value.substring(0, (limit - 0)) + suffix;
    }
    return value

})
