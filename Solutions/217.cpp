#include <stdio.h>
#include<math.h>
long int arr[1000001];
long int gcd(long int a, long int b)
{
    long int max,min,r;
    max=a>=b?a:b;
    min=a<=b?a:b;
    r=max%min;
    if(r==0)
        return min;
    else return(gcd(r,min));
}
int main()
{
    long int t,n,i,j,max=1,hcf,k;
    scanf("%ld",&t);

    for(j=0;j<t;j++)
    {
        scanf("%d",&n);
        for(i=0;i<n;i++)
            scanf("%ld",&arr[i]);
        for(i=0;i<n;i++)
        {
            if(arr[i]==1)
                continue;
            for(k=i+1;k<n;k++)
            {
                hcf=gcd(arr[i],arr[k]);
                if(hcf>max)
                    max=hcf;
            }
        }
        printf("%ld\n",max);



}
}
