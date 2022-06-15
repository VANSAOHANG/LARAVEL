
axios.get("http://127.0.0.1:8000/api/posts").then((result)=>{
    console.log(result.data);
}).catch((error)=>{
    console.log(error)
})
