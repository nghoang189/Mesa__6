const Search=()=>{
    
    const{useState}=React;
    
    const[eye,seteye]=useState(true);
    const[none,setnone]=useState(true);
    const[inputtext,setinputtext]=useState("");
    
    
    
    const[password,setpassword]=useState("password");
     
     
    
    const input=(e)=>{
        const value=e.target.value;
        setinputtext(value); 
        if(value.length>0){
            setnone(false);
        }
        else{
            setnone(true); 
        }
    }
    
    const Eye=()=>{
        if(password=="password"){
            setpassword("text");
            seteye(false);
        }
        else{
            setpassword("password");
            seteye(true);
        }
    }
    
    return(
        <>
            <div class="container">
                <div class="input_text">
                    <input type={password} onChange={input} value={inputtext} required />
                    <span></span>
                    <i onClick={Eye} className={`fa ${eye ? "fa-eye-slash" : "fa-eye"} ${none ? "d-none" : ""}`}></i>
                </div>
            </div>
        </>
        );
}

ReactDOM.render(<Search/>,document.getElementById("Pass"));