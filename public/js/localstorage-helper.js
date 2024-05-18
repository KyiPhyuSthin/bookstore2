// Sets an item with a Key to local storage
function saveStorage(key, data)
{
    localStorage.setItem(key, JSON.stringify(data));
    return true;
}

// Looks for a local storage item and returns if present
function getStorage(key)
{
    let storedData = localStorage.getItem(key);
    if(storedData == null){
        return null;
    }

    return storedData;
}

// Get stored item with id
function getStorageItem(key, id)
{
    let storedData = localStorage.getItem(key);
    if(storedData == null){
        return null;
    }
    const data = JSON.parse(storedData);

    return data[id];
}

// Clear a single item with key
function removeStorage(key)
{
    localStorage.removeItem(key);
    return true;
}

// Clear the whole local storage
function clearStorage()
{
    localStorage.clear();
    return true;
}

// Function to add a book to local storage
function saveObjectInObjectsArrayToLocalStorage(key, object) {
    // Retrieve the books array from local storage
    let objects = localStorage.getItem(key);

    // Check if the books key exists in local storage
    if (objects) {
        // Parse the JSON string to a JavaScript array
        objects = JSON.parse(objects);
    } else {
        // Initialize an empty array if no books key exists
        objects = [];
    }

    // Add the new book to the array
    if(objects.length > 0){
        let index = objects.findIndex(storedObject => storedObject.id === object.id);
        if(index != -1){
            objects[index] = object;
        }
        else{
            objects.push(object);
        }
    }
    else{
        objects.push(object);
    }

    // Convert the array back to a JSON string
    const objectsAsJson = JSON.stringify(objects);

    // Save the updated array back to local storage
    localStorage.setItem(key, objectsAsJson);

    return object;
}

function findObjectInObjectsArrayFromLocalStorage (key, objectId) {
    // Retrieve the books array from local storage
    let objects = localStorage.getItem(key);

    // Check if the books key exists in local storage
    if (objects) {
        // Parse the JSON string to a JavaScript array
        objects = JSON.parse(objects);
        objects.forEach((object)=>{
            if(object.id === objectId){
                return object;
            }
            else{
                return false;
            }
        });
    } else {
        // Initialize an empty array if no books key exists
        return false;
    }
}

// Function to add a book to local storage
function deleteObjectInObjectsArrayFromLocalStorage(key, object) {
    // Retrieve the books array from local storage
    let objects = localStorage.getItem(key);

    // Add the new book to the array
    if(objects){
        objects = JSON.parse(objects);
        if(objects.length > 0){
            let index = objects.findIndex(storedObject => storedObject.id === object.id);
            if(index != -1){
                objects.splice(index, 1);
                const objectsAsJson = JSON.stringify(objects);
                localStorage.setItem(key, objectsAsJson);

                return true;
            }
        }
    }

    return false;
}
