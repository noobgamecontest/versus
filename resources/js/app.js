require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'ladder-ranking',
    require('./components/LadderRankingComponent.vue').default
);

Vue.component(
    'ladder-register-team',
    require('./components/LadderRegisterTeamComponent.vue').default
);

const app = new Vue({
    el: '#app',
});
