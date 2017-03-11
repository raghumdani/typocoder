 #include <stdio.h> 

int main() { 
    int t;
    scanf("%d",&t);
    int i;int c=0,j;int n=0;int a[t];
    for(i=0;i<t;i++)
    {
        scanf("%d",&a[i]);
    }
    for(i=0;i<t;i++)
    {
        c=0;
        n=a[i];
        for(j=2;j<n/2;j++)
        {
            if(c>0)break;
            if(n%j==0)c++;
        }
        if(c>0)
        printf("NO\n");
        else printf("YES\n");
    }
	return(0);
}