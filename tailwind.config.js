module.exports = {
    darkMode: "class",
    purge: [],
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    content: [],
    theme: {
        extend: {},
    },
    plugins: ["blur", require("daisyui")],
};
