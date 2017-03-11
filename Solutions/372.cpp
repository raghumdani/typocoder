#include "bits/stdc++.h"
using namespace std;

int main()
{
    int t;
    scanf("%d", &t);
    while( t-- )
    {
        int n;
        scanf("%d", &n);
        int ans = 1;
        do
        {
            ans*=(n%10);
            n/=10;

        }while(n);
        printf("%d\n",ans);
    }
    return 0;
}
