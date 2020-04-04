define(['vue'], function (vue) {
    return function (data) {
        new vue({
            el: "#app",
            data: {
                menus: data
            },
            methods: {
                // add(){
                //     var item = {type:'view',name:'zjy',url:'xxx.com'};
                //         this.menus.push(item);
                // }
                add: function () {
                    if (this.menus.length < 3) {
                        let menu = {type: 'view', name: 'zjy', url: 'xxx.com',sub_button:[]};
                        this.menus.push(menu);
                    }
                },
                delMenu:function(pos){
                    this.menus.splice(pos,1);
                },
                addSubMenu:function(item){
                    if (item.sub_button.length < 5) {
                        let menu = {type: 'view', name: 'zjys', url: 'xxx.com'};
                        item.sub_button.push(menu);
                    }
                },
                delSubMenu:function(item,pos){
                    item.sub_button.splice(pos,1);
                }
            }
        });
    }
});