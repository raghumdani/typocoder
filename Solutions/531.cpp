#include "bits/stdc++.h"
using namespace std;

int solve(int p,int N)
{
    if(N==0)
        return !p;
    if(p==1)
    return (solve(!p,N/2)||solve(!p,N/3)||solve(!p,N/4));
    else
    return (solve(!p,N/2)&&solve(!p,N/3)&&solve(!p,N/4));
}

int main()
{
    int t;
    scanf("%d", &t);
    while( t-- )
    {
        long long int n;
        scanf("%lld", &n);
        int megh = solve(1,n);
        if(megh == 1)
            printf("Alice\n");
        else
            printf("Bob\n");
    }
    return 0;
}
