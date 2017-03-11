#include<bits/stdc++.h>
using namespace std;

int main()

{

    int i, n, sum=0, sum1=0, diff;

    scanf("%d", &n);

    int a[n];

    for(i=0;i<n;i++)
    scanf("%d", &a[i]);

    for(i=0;i<n;i++)
        sum+=(n-i)*a[i];

    sort(a, a+n);

    for(i=0;i<n;i++)
        sum1+=(n-i)*a[i];

    diff = sum-sum1;

    printf("%d\n", diff);

return 0;

}
