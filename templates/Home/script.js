class Home {
    constructor() {

    }

    async loadPosts(algorithm) {
		let url = config.api + '/posts';
		switch (algorithm) {
            case 'hot' :
                url += '/hot';
                break;
            case 'new':
                url += '/new';
                break;
            default:
                url += '/hot';
                break;
        }
        const posts = await get(url);
    }
}

$(() => {
    new Home();
});