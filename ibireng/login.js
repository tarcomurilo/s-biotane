import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2/+esm';

const supabaseUrl = 'https://0ec90b57d6e95fcbda19832f.supabase.co';
const supabaseAnonKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJib2x0IiwicmVmIjoiMGVjOTBiNTdkNmU5NWZjYmRhMTk4MzJmIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTg4ODE1NzQsImV4cCI6MTc1ODg4MTU3NH0.9I8-U0x86Ak8t2DGaIk0HfvTSLsAyzdnz-Nw00mMkKw';

const supabase = createClient(supabaseUrl, supabaseAnonKey);

const loginForm = document.getElementById('loginForm');
const messageDiv = document.getElementById('message');
const forgotPasswordLink = document.getElementById('forgotPassword');
const registerLink = document.getElementById('register');

function showMessage(text, type = 'info') {
    messageDiv.textContent = text;
    messageDiv.className = `message ${type}`;
    messageDiv.style.display = 'block';

    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 5000);
}

loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const submitButton = loginForm.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = 'Entrando...';

    try {
        const { data, error } = await supabase.auth.signInWithPassword({
            email: email,
            password: password,
        });

        if (error) throw error;

        showMessage('Login realizado com sucesso!', 'success');

        setTimeout(() => {
            window.location.href = 'dashboard.html';
        }, 1000);

    } catch (error) {
        showMessage(error.message || 'Erro ao fazer login. Verifique suas credenciais.', 'error');
        submitButton.disabled = false;
        submitButton.textContent = 'Entrar';
    }
});

forgotPasswordLink.addEventListener('click', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;

    if (!email) {
        showMessage('Por favor, insira seu e-mail primeiro.', 'info');
        return;
    }

    try {
        const { error } = await supabase.auth.resetPasswordForEmail(email);

        if (error) throw error;

        showMessage('E-mail de recuperação enviado! Verifique sua caixa de entrada.', 'success');
    } catch (error) {
        showMessage(error.message || 'Erro ao enviar e-mail de recuperação.', 'error');
    }
});

registerLink.addEventListener('click', (e) => {
    e.preventDefault();
    window.location.href = 'register.html';
});

(async () => {
    const { data: { session } } = await supabase.auth.getSession();
    if (session) {
        window.location.href = 'dashboard.html';
    }
})();
