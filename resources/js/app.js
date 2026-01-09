import '@css/app.css';

// Accept Hot Module Replaycement (HMR) as per: https://vitejs.dev/guide/api-hmr.html
if (import.meta.hot) {
    import.meta.hot.accept(() => {
        console.log('HMR');
    });
}
