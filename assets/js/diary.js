var base_Url = 'http://localhost:8080/YourSecretDiary/';
var ref = this;

window.onload = function () {

    MainDiarySideBarClick();

}

function MainDiarySideBarClick() {
    var sidebarList = document.getElementById('sidebarList');
    sidebarList.onclick = function (e) {
        e = event || window.event;
        e.preventDefault();
        var targetElement = e.target || e.srcElement;
        CheckTargetElementID(targetElement);
    }

}

function CheckTargetElementID(targetElmt) {
    switch (targetElmt.getAttribute('Id')) {
        case 'post':
            SetDataInMainDiary(targetElmt);
            break;
        case 'edit':
            EditClickHandler(targetElmt);
            break;
        case 'delete':
            DeleteClickHandler(targetElmt);
            break;
    }
}

function EditClickHandler(targetElmt){
    if(confirm('Are you sure you want to edit this post?')==true){
        var Id = targetElmt.parentNode.getAttribute('Id');
        window.open(base_Url + 'Diary/EditPost/' + Id,'_self',null,true);
    }
}


function SetDataInMainDiary(targetElmt) {
    document.getElementById('diaryTitle').innerHTML = targetElmt.getAttribute('title');
    document.getElementById('diaryBody').innerHTML = targetElmt.getAttribute('data-body');
}

function DeleteClickHandler(targetElmt) {
    
    if (confirm("Are you sure you want to delete this post?") == true) {
        var unorderedList = document.getElementById('sidebarList');
        var targetList = targetElmt.parentNode;
        DeleteAjax(targetList.getAttribute('Id'));
        unorderedList.removeChild(document.getElementById(targetList.getAttribute('Id')));
    }
}

function DeleteAjax(postID) {

    try {
        var http = new XMLHttpRequest();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                return http.response;
            }
        }
        http.open('POST', base_Url + 'Diary/DeletePost/' + postID, true);
        http.send();
    } catch (e) {
        ref.alert(e);
        return false;
    }
}

function GetPost(PId, UId) {
    var Post;
    var http = new XMLHttpRequest();
    if (http.readyState == 4 && http.status == 200) {
        Post = http.response;
    }
    http.open('GET', base_Url + 'Api/YSD_Api/GetPost/' + PId + '/' + UId, true);
    http.send();
    return Post;
}

function NewPost() {
    var params = 'Title=testinglangto&Body=lalonato';
    var http = new XMLHttpRequest();
    if (http.readyState = 4 && http.status == 200) {
        alert('good to go');
    }
    http.open('POST', base_Url + 'Api/YSD_Api/NewPost', true);
    http.send(params);

}