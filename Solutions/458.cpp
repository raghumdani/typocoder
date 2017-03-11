#include<bits/stdc++.h>
using namespace std;

long long ans;

int main()
{
    int t;
    string s;
    scanf("%d", &t);
    while(t--)
    {
        ans = 1;
        cin>>s;
        for(int i = 0; i < (int)s.length(); i++)
            ans *= (s[i] - '0');
        printf("%lld\n", ans);
    }
    return 0;
}
