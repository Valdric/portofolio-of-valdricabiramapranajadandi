export default async function handler(req, res) {
  if (req.method !== 'POST') {
    res.setHeader('Allow', ['POST']);
    return res.status(405).json({ error: 'Method not allowed' });
  }

  const { name, email, message } = req.body;

  if (!name || !email || !message) {
    return res.status(400).json({ error: 'Missing required fields' });
  }

  const resendApiKey = process.env.RESEND_API_KEY || 're_L5Dy1QPd_NAFv14iMEouKdDfhJbvm7qdJ';

  const htmlContent = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Transmission Received</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f0;
            padding: 40px 20px;
            color: #121212;
        }
        .wrapper {
            max-width: 560px;
            margin: 0 auto;
            background: #FAF9F6;
            border: 2px solid #121212;
            border-radius: 16px;
            overflow: hidden;
        }
        .header {
            background: #121212;
            color: #FAF9F6;
            padding: 28px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header-brand {
            font-size: 18px;
            font-weight: 900;
            letter-spacing: -0.03em;
            text-transform: uppercase;
        }
        .header-brand span {
            display: inline-block;
            background: #416afc;
            padding: 2px 8px;
            border-radius: 4px;
            margin-right: 6px;
        }
        .header-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #FAF9F6;
            opacity: 0.55;
        }
        .body {
            padding: 32px;
        }
        .tag {
            display: inline-block;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #416afc;
            margin-bottom: 16px;
        }
        .title {
            font-size: 22px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.02em;
            margin-bottom: 24px;
            line-height: 1.1;
        }
        .field {
            border-top: 1.5px solid #12121218;
            padding: 14px 0;
        }
        .field:last-of-type {
            border-bottom: 1.5px solid #12121218;
        }
        .field-label {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #121212;
            opacity: 0.45;
            margin-bottom: 5px;
        }
        .field-value {
            font-size: 14px;
            font-weight: 600;
            color: #121212;
            line-height: 1.6;
            word-break: break-word;
        }
        .field-value a {
            color: #416afc;
            text-decoration: none;
        }
        .cta-area {
            margin-top: 28px;
            padding: 20px;
            background: #FFF6C6;
            border: 1.5px solid #12121225;
            border-radius: 10px;
            text-align: center;
        }
        .cta-area p {
            font-size: 11px;
            color: #121212;
            opacity: 0.65;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .cta-btn {
            display: inline-block;
            background: #121212;
            color: #FAF9F6;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 100px;
        }
        .footer {
            padding: 20px 32px;
            border-top: 1.5px solid #12121215;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #121212;
            opacity: 0.40;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Header -->
        <div class="header">
            <div class="header-brand">
                <span style="display: inline-block; background: #416afc; padding: 2px 8px; border-radius: 4px; margin-right: 6px; color: #FAF9F6; font-weight: 900;">V</span>Abirama
            </div>
            <div class="header-label">Portfolio Notification</div>
        </div>

        <!-- Body -->
        <div class="body">
            <div class="tag">[ New Transmission Received ]</div>
            <div class="title">Someone sent you a message</div>

            <div class="field">
                <div class="field-label">Sender Name</div>
                <div class="field-value">${name}</div>
            </div>

            <div class="field">
                <div class="field-label">Email Coordinate</div>
                <div class="field-value">
                    <a href="mailto:${email}">${email}</a>
                </div>
            </div>

            <div class="field">
                <div class="field-label">Message / Pitch</div>
                <div class="field-value">${message.replace(/\n/g, '<br>')}</div>
            </div>

            <div class="cta-area">
                <p>Reply directly to this sender</p>
                <a href="mailto:${email}" class="cta-btn">Reply to ${name} ↗</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            © 2026 Valdric Abirama Pranaja Dandi · portfolio.2026
        </div>
    </div>
</body>
</html>`;

  try {
    const response = await fetch('https://api.resend.com/emails', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${resendApiKey}`
      },
      body: JSON.stringify({
        from: 'Valdric Portfolio <onboarding@resend.dev>',
        to: 'valdricapd@gmail.com',
        subject: `[ New Transmission ] from ${name}`,
        html: htmlContent,
        reply_to: email
      })
    });

    const data = await response.json();

    if (!response.ok) {
      console.error('Resend API error:', data);
      return res.status(response.status).json({ error: data.message || 'Error sending email' });
    }

    return res.status(200).json({ success: true, data });
  } catch (err) {
    console.error('Server error sending email:', err);
    return res.status(500).json({ error: 'Internal Server Error' });
  }
}
