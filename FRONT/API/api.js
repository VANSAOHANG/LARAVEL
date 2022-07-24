
let c = console.log
let allPostContainer = document.getElementById("allPost")
var userPostContainer = document.getElementById("userPost")
let input_email = document.getElementById("input_email")
let back = document.getElementById("back")

c(userPostContainer)
let seePost = document.getElementById("seePost");
let userEmail = document.getElementById("userEmail")
c(userEmail)
function postsView() {
    axios.get("http://127.0.0.1:8000/api/posts").then((result) => {
        createDomPosts(result.data,allPostContainer)
        return result.data;
    }).catch((error) => {
        console.log(error)
    })
}
function commentView(data,card) {
    data.forEach(comment => {
        axios.get("http://127.0.0.1:8000/api/users/" + comment.user_id).then((result) => {
            let data = result.data;
            let name = data.name;
            let textComment = document.createElement('h4');
            textComment.textContent = name + " : " + comment.text;
            card.appendChild(textComment);
        }).catch((error) => {
            console.log(error)
        })

    });
}
function createDomPosts(posts,contain) {
    hide(back)
    posts.forEach(post => {
        // c(post.user.id)
        let card = document.createElement("div");
        card.className = 'card';
        contain.appendChild(card);

        let deleteBtn = document.createElement('button');
        deleteBtn.id = "deleteBtn";

        let userName = document.createElement('h4');
        userName.textContent = post.user.name;
        card.appendChild(userName);

        let title = document.createElement('h2');
        title.textContent = post.title;
        card.appendChild(title);

        let description = document.createElement('h3');
        description.textContent = post.description;
        card.appendChild(description);

        // let img = document.createElement('img');
        // img.src = 'd.png';
        // card.appendChild(img);
        let line = document.createElement('div');
        line.className = 'line';
        card.appendChild(line);
        commentView(post.comment,card);
    });

}
function createDomUserPosts(users) {
    hide(allPostContainer)
    hide(input_email)
    show(back)
    show(userPostContainer)
    
    // console.log(users[0].post)
    users[0].post.forEach(user => {
        c(user)
        let card = document.createElement("div");
        card.className = 'card';
        userPostContainer.appendChild(card);


        let userName = document.createElement('h4');
        userName.textContent = user.name;
        card.appendChild(userName);

        let title = document.createElement('h2');
        title.textContent = user.title;
        card.appendChild(title);

        let description = document.createElement('h3');
        description.textContent = user.description;
        card.appendChild(description);

        // let img = document.createElement('img');
        // img.src = 'd.png';
        // card.appendChild(img);
        let line = document.createElement('div');
        line.className = 'line';
        card.appendChild(line);
        commentView(user.comment,card);
    });

}
function userPosts(){
    c(userEmail.value)
    axios.get("http://127.0.0.1:8000/api/userAndPost/?email="+userEmail.value).then((result) => {
        // console.log(result.data[1])
        createDomUserPosts(result.data)
    }).catch((error) => {
        console.log(error)
    })
}
function goBack(){
    userEmail.value = "";
    hide(userPostContainer);
    hide(back)
    show(allPostContainer)
    show(input_email)
}
function hide(item){
    item.style.display = "none";
}
function show(item){
    item.style.display = "block";
}
postsView();
seePost.addEventListener('click', userPosts);
back.addEventListener('click', goBack);

