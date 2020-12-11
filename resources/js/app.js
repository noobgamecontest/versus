require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'ladder-ranking',
    require('./components/Ladders/LadderRankingComponent.vue').default
);

Vue.component(
    'ladder-component',
    require('./components/Ladders/LadderComponent.vue').default
);

const app = new Vue({
    el: '#app',
});
