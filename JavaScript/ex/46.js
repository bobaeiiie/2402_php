// async/await

// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         },1000);
//     },2000);     
// },3000)

const PRO2 = (str, ms) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

// PRO2('A', 3000)
// .then(() => {
//     PRO2('B', 2000)
// })
// .then(() => PRO2('C', 1000))
// .catch(() => console.log('에러'))
// .finally(() => console.log('파이널리'));

const myAsync = async () => {
    try {
        await PRO2('A', 3000);
        await PRO2('B', 2000);
        await PRO2('C', 1000);
    } catch(err) {
        console.log(arr);
    }
}
