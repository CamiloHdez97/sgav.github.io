const opc = {

    "GET":() => getDataAll(),
    "PUT": (data,id) => putData(data,id),
    "DELETE": (id)=> deleteData(id),
    "SEARCH": (data) => searchData(data),
    "POST": (data) => postData(data)

}

let config = {

    headers: new Headers(
        {"content-Type": "application/json; charset:utf8"}
    ),
};

const getDataAll = async () => {

    config.method = "GET";
    let res = await (await fetch("controllers/Country/insert_data.php", config)).json();
    return res;

}

const postData = async(data)=>{

    config.method = "POST";
    config.body = JSON.stringify(data);
    let res = await (await fetch("../controllers/Country/insert_data.php", config)).text();
    return res;

}

const putData = async(data,id) => {

    config.method = "PUT";
    config.body = JSON.stringify(data);
    let res = await (await fetch("../controllers/Country/update_data.php",config)).json();

}

export {

    getDataAll,
    postData,
    putData,
    opc,

}