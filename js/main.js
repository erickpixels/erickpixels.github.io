// Optional JavaScript for any dynamic behavior, such as appointment validation.
console.log('Appointment Manager Loaded');

if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
        navigator.serviceWorker
            .register("./sw.js")
            .then((registration) => {
                console.log("Service Worker registrado con éxito:", registration);
            })
            .catch((error) => {
                console.error("Error al registrar el Service Worker:", error);
            });
    });
}
