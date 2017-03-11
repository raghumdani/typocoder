#include<bits/stdc++.h>
using namespace std;
void scan()
{
unsigned long long int prod=1;
int n;
scanf("%d",&n);
if(n==0)
printf("0\n");
else
{
    while(n!=0)
    {
    prod*=n%10;
    n=n/10;
    if(prod==0)
    break;
    }
    printf("%llu\n",prod);
}
    
}
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    scan();
}