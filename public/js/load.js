function load(args){
	
	//args.url 
	//args.data
	//args.callback
	//args.container
	
	if(undefined == args.data){
		
		$(args.container).load(args.url,function(){
		
			if(typeof args.callback=='function'){
				args.callback();
			}
		
		});
	
	}else{
		
		$(args.container).load(args.url,args.data,function(){
		
			if(typeof args.callback=='function'){
				args.callback();
			}
		
		});
		
	}
	
	
	
}