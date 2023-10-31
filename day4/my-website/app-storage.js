class myStorage {
    storage;
    constructor() {
        this.storage = localStorage;
    }

    setStorage(storage) {
        this.storage = storage;
    }



    setValue(key, value) {
        logError(`Set Value of Storage was called with key : ${key} and value : ${value}`)
        this.storage.setItem(key, value);
    }
    getValue(item) {
        logError(`Get Value of Storage was called with key : ${item}`);
      //return "red"; //
      return this.storage.getItem(item);
      logError(this.storage.getItem(item));

    }
}