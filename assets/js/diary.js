window.onload = function(){

    MainDiarySideBarClick();

}

function MainDiarySideBarClick(){
    var sidebarList = document.getElementById('sidebarList');
    sidebarList.onclick = function(e){
        e = event || window.event;
        e.preventDefault();
        var targetElement = e.target || e.srcElement;
        if(targetElement.getAttribute('Id') == 'post'){
            document.getElementById('diaryTitle').innerHTML = targetElement.getAttribute('title');
            document.getElementById('diaryBody').innerHTML = targetElement.getAttribute('data-body');
        }else if(targetElement.getAttribute('Id') == 'edit'){
            alert('edit');
        }else if(targetElement.getAttribute('Id') == 'delete'){
            if(confirm("Are you sure you want to delete this post?")==true){
                alert('deleted');
            }
        }
    }

}

function GetPost(PId,UId){
    var Post;
    var http = new XMLHttpRequest();
	if(http.readyState == 4 && http.status == 200){
           Post = http.response;	
	}
	http.open('GET','http://localhost:8080/YourSecretDiary/Api/YSD_Api/GetPost/' + PId + '/' + UId,true);
    http.send();
    return Post;
}

function NewPost(){
    var params = 'Title=testinglangto&Body=lalonato';
    var http = new XMLHttpRequest();
    if(http.readyState = 4 && http.status == 200){
        alert('good to go');
    }
    http.open('POST','http://localhost:8080/YourSecretDiary/Api/YSD_Api/NewPost',true);
    http.send(params);

}