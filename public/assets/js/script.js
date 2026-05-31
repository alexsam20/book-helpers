function runJavaScriptCode(codeId, outputId) {
    const codeContainer = document.getElementById(codeId);
    const outputContainer = document.getElementById(outputId);
    if (!codeContainer || !outputContainer) return;

    outputContainer.style.display = 'block';
    outputContainer.innerHTML = '';

    const codeRun = codeContainer.textContent;

    const customLog = (...args) => {
        const text = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg, null, 2) : arg).join(' ');
        outputContainer.innerHTML += text + '\n';
    };

    try {
        const runner = new Function('console', `
                                try {
                                    ${codeRun}
                                } catch (err) {
                                    throw err;
                                }
                            `);
        runner({ log: customLog, error: customLog, warn: customLog });

        if (outputContainer.innerHTML === '') {
            outputContainer.innerHTML = '<span style="color: #0c562d;">// The code run successfully, but did\'t output anything</span>';
        }
    } catch (error) {
        outputContainer.innerHTML = `<span style="color: #ff6b6b;">Error: ${error.message}</span>`;
    }
}

function runPhpCode(codeId, outputId) {
    const output = document.getElementById(outputId);
    const csrfInput = document.querySelector('input[name="csrf_token"]');

    output.style.display = 'block';
    output.innerHTML = 'Running php code to the server...';

    /*const currentToken = csrfInput.value;*/

    const params = new URLSearchParams();
    params.append('id', codeId);
    params.append('_csrf', csrfInput.value);

    fetch('/post', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: params.toString()
    })
        .then(response => {
            if (!response.ok) throw new Error('Error server: ' + response.status);
            return response.json();
        })
        .then(data => {
            if (data.nextToken) {
                csrfInput.value = data.nextToken
            }

            if (data.success) {
                output.innerHTML = data.output;
            } else {
                output.innerHTML = `Error Security: ${data.message}`;
            }
        })
        .catch(error => {
            output.innerHTML = `Error Request:  ${error.message}`
        });
}

function updateAllCsrfTokens(newToken) {
    document.querySelectorAll('input[name="_csrf"]').forEach(input => {
        input.value = newToken;
    });
}

function contentFroala(cnt) {

}
