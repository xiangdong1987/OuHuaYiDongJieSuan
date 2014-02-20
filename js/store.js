//设置本地参数
function kset(key, value){
    console.log("key:"+key+" value:"+value);
    window.localStorage.setItem(key, value);
}
//读取本地参数
function kget(key){
    console.log(key);
    return window.localStorage.getItem(key);
}
//删除本地参数
function kremove(key){
    window.localStorage.removeItem(key);
}
//清空本地参数
function kclear(){
    window.localStorage.clear();
}
//测试更新方法
function kupdate(key,value){
    window.localStorage.removeItem(key);
    window.localStorage.setItem(key, value);
}