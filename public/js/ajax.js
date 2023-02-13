$(function(){
    $('.favzbtn').on('click', function(){
        let $this = $(this);
        let zid = $this.data('zooid');
        let uid = $this.data('userid');
        let favz = $this.data('favz');
        console.log(favz);
        
        function ajaxFav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/zoos/like/${zid}`,
                        type: "POST",
                        data: {
                            'zoo_id': zid,
                            'user_id': uid,
                        },
                    })
        }
        function ajaxUnfav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/zoos/unlike/${zid}`,
                        type: "POST",
                        data: {
                            'zoo_id': zid,
                            'user_id': uid,
                        },
                    })
        }
        if(favz === "" && !($this.next().hasClass("is_show"))){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(favz == "0" && $this.hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(favz != "1" && favz != "" && !$this.next().hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(favz == "1" && $this.hasClass("is_show")){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } 
        
    })
    
    
    //favanimal settings
    $('.favabtn').on('click', function(){
        let $this = $(this);
        let aid = $this.data('anmlfid');
        let uid = $this.data('userid');
        let fava = $this.data('fava');
        console.log(fava);
        
        function ajaxFav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/zoos/each/like/${aid}`,
                        type: "POST",
                        data: {
                            'animal_family_id': aid,
                            'user_id': uid,
                        },
                    })
        }
        function ajaxUnfav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/zoos/each/unlike/${aid}`,
                        type: "POST",
                        data: {
                            'animal_family_id': aid,
                            'user_id': uid,
                        },
                    })
        }
        if(fava === "" && !($this.next().hasClass("is_show"))){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(fava == "0" && $this.hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(fava != "1" && fava != "" && !$this.next().hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(fava == "1" && $this.hasClass("is_show")){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } 
        
    })
    
    
    //like settings
    $('.likebtn').on('click', function(){
        let $this = $(this);
        let pid = $this.data('postid');
        let uid = $this.data('userid');
        let like = $this.data('like');
        console.log(like);
        
        function ajaxFav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/gallery/like/${pid}`,
                        type: "POST",
                        data: {
                            'post_id': pid,
                            'user_id': uid,
                        },
                    })
        }
        function ajaxUnfav(){
            return $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/gallery/unlike/${pid}`,
                        type: "POST",
                        data: {
                            'post_id': pid,
                            'user_id': uid,
                        },
                    })
        }
        if(like === "" && !($this.next().hasClass("is_show"))){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                $('.likeNum').text(`${data}いいね`);
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(like == "0" && $this.hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                $('.likeNum').text(`${data}いいね`);
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(like != "1" && like != "" && !$this.next().hasClass("is_show")){
            ajaxUnfav().done(function(data, status, xhr){
                console.log(data);
                $this.hide();
                $this.next().addClass("is_show");
                $('.likeNum').text(`${data}いいね`);
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } else if(like == "1" && $this.hasClass("is_show")){
            ajaxFav().done(function(data, status, xhr){
                console.log(data);
                $this.removeClass("is_show");
                $this.prev().show();
                $('.likeNum').text(`${data}いいね`);
                
            }).fail(function(xhr, status, error){
                console.log(xhr.status);
            });
        } 
        
    })
    
})


