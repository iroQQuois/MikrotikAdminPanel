var vm = new Vue ({
    el: '#app',
    data: {
        status: 'hide',
        txt: '',
    },
    watch: {
        txt: function () {
            this.status = this.txt.length > 0 ? 'admin__input-button' : 'hide'
        },
    },
});