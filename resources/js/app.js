require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'ladder-ranking',
    require('./components/Ladders/LadderRankingComponent.vue').default
);
Vue.component(
    'ladders-component',
    require('./components/Ladders/LaddersComponent.vue').default
);
Vue.component(
    'ladder-create',
    require('./components/Ladders/LadderCreateComponent.vue').default
);
Vue.component(
    'ladder-edit',
    require('./components/Ladders/LadderEditComponent.vue').default
);
Vue.component(
    'nav-component',
    require('./components/NavComponent.vue').default
);

const app = new Vue({
    el: '#app',
});
