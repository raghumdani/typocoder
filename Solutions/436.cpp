#include<bits/stdc++.h>
using namespace std;

int a[100005], imap[100005];
stack<int> s;
long long ans;

int main()
{
    int n;
    scanf("%d", &n);
    for(int i = 0; i < n; i++)
    {
        scanf("%d", a + i);
        imap[a[i]] = i;
    }
    int j = imap[n];
    j = (j + 1) % n;
    while(j != imap[n])
    {
        while(!s.empty() && s.top() < a[j])
        {
            int i = imap[s.top()];
            if(i < j)
                ans += j - i;
            else
                ans += n + j - i;
            s.pop();
        }
        s.push(a[j]);
        j = (j + 1) % n;
    }
    while(!s.empty() && s.top() < a[j])
    {
        int i = imap[s.top()];
        if(i < j)
            ans += j - i;
        else
            ans += n + j - i;
        s.pop();
    }
    printf("%lld\n", ans + n);
    return 0;
}
