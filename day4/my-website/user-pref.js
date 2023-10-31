class userPref{

    constructor()
    {
        this.name="Guest";
        this.myColor="black";
        this.storage= new myStorage(); // this class must be available
        this.countvisit=0;    
    }
    getPref(){
        let tempColor=this.storage.getValue("myColor");
        this.myColor=tempColor;
       this.name=this.storage.getValue("name");
    }
    setPref()
    {
        this.storage.setValue("name",this.name);
        this.storage.setValue("myColor",this.myColor);

    }
}