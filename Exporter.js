window.addEvent('domready', function(){

    $('all-fields').addEvent('change',function(ev){
        $('available_fields').getElements('input').each(function(item,index){
            if (item != null) {
                item.set('checked','checked');
                $('use_fields').adopt(item.getParent());
            }
        });
    });

    $$('#available_fields','#use_fields').getElements('input').each(function(item,index){
            if (item.indexOf('array') == -1) {
                item.each(function(el,key){
                    el.addEvent('change',function(ev){
                        if ($('available_fields').hasChild(el)) {
                            $('use_fields').adopt(el.getParent());
                        } else {
                            if (el.get('checked') == 'checked') {
                                el.set('checked','checked');
                            }
                            $('available_fields').adopt(el.getParent());
                        }
                    });
                });
            }
    });
});
