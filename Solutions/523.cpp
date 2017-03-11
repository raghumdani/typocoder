#include<bits/stdc++.h>
using namespace std;
 
map<long long, bool> m;
// 0 Losing state
// 1 Winning state
 
bool solve(long long n)
{
    if(m.find(n) != m.end())
        return m[n];
    bool b1, b2, b3;
    b1 = solve(n / 2);
    b2 = solve(n / 3);
    b3 = solve(n / 4);
    if(b1 == 0 || b2 == 0 || b3 == 0)
        m[n] = 1;
    else
        m[n] = 0;
    return m[n];
}
 
int main()
{
    long long x;
    int t;
    scanf("%d", &t);
    m[0] = 0;
    while(t--)
    {
        scanf("%lld", &x);
        if(solve(x))
            printf("Alice\n");
        else
            printf("Bob\n");
    }
    return 0;
}